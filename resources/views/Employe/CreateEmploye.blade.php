{{-- resources/views/Employe/CreateEmploye.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Authentification Employé</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; background:#f5f7fb; color:#222; padding:24px; }
        .card { max-width:480px; margin:24px auto; background:#fff; border-radius:8px; padding:20px; box-shadow:0 6px 20px rgba(0,0,0,0.06); }
        label { display:block; margin:8px 0 4px; font-weight:600; }
        input[type="email"], input[type="password"] { width:100%; padding:10px; border:1px solid #d8dee9; border-radius:6px; }
        button { margin-top:12px; padding:10px 14px; border:0; background:#2563eb; color:#fff; border-radius:6px; cursor:pointer; }
        button.secondary { background:#6b7280; }
        .meta { margin-top:12px; font-size:14px; color:#374151; }
        pre { background:#0f172a; color:#e6eef8; padding:12px; border-radius:6px; overflow:auto; font-size:13px; }
        .msg { margin-top:12px; padding:10px; border-radius:6px; }
        .success { background:#ecfdf5; color:#065f46; border:1px solid #bbf7d0; }
        .error { background:#fff1f2; color:#991b1b; border:1px solid #fecaca; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Connexion Employé</h2>
        <form id="loginForm">
            <label for="email">E‑mail</label>
            <input id="email" name="email" type="email" autocomplete="username" required />

            <label for="password">Mot de passe</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required />

            <button type="submit">Se connecter</button>
        </form>

        <div id="actions" style="display:none; margin-top:12px;">
            <button id="logoutBtn" class="secondary">Se déconnecter</button>
        </div>

        <div id="message" class="msg" style="display:none"></div>

        <div id="employeInfo" class="meta" style="display:none;">
            <h4>Informations employé</h4>
            <pre id="employeJson">{}</pre>
        </div>
    </div>

    <script>
        (function () {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const loginForm = document.getElementById('loginForm');
            const messageEl = document.getElementById('message');
            const employeInfo = document.getElementById('employeInfo');
            const employeJson = document.getElementById('employeJson');
            const actions = document.getElementById('actions');
            const logoutBtn = document.getElementById('logoutBtn');

            // keep last credentials to call deconnexion (controller expects email/password)
            let lastCredentials = null;

            function showMessage(text, type) {
                messageEl.style.display = 'block';
                messageEl.textContent = text;
                messageEl.className = 'msg ' + (type === 'error' ? 'error' : 'success');
            }

            function hideMessage() {
                messageEl.style.display = 'none';
            }

            function showEmploye(data) {
                employeInfo.style.display = 'block';
                employeJson.textContent = JSON.stringify(data, null, 2);
                actions.style.display = 'block';
            }

            function clearEmploye() {
                employeInfo.style.display = 'none';
                employeJson.textContent = '{}';
                actions.style.display = 'none';
            }

            loginForm.addEventListener('submit', function (e) {
                e.preventDefault();
                hideMessage();
                clearEmploye();

                const email = document.getElementById('email').value.trim();
                const password = document.getElementById('password').value;

                if (!email || !password) {
                    showMessage('Veuillez renseigner l\'email et le mot de passe.', 'error');
                    return;
                }

                lastCredentials = { email, password };

                fetch('/employe/authentification', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ email, password })
                })
                .then(async res => {
                    const json = await res.json().catch(()=>({}));
                    if (!res.ok) {
                        const err = json.error || json.message || 'Erreur lors de la connexion';
                        throw new Error(err);
                    }
                    return json;
                })
                .then(data => {
                    showMessage('Connecté avec succès.', 'success');
                    showEmploye(data.employe || data.user || {});
                })
                .catch(err => {
                    showMessage(err.message || 'Identifiants incorrects', 'error');
                });
            });

            logoutBtn.addEventListener('click', function () {
                hideMessage();

                if (!lastCredentials) {
                    showMessage('Aucun identifiant enregistré pour la déconnexion.', 'error');
                    return;
                }

                fetch('/employe/deconnexion', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(lastCredentials)
                })
                .then(async res => {
                    const json = await res.json().catch(()=>({}));
                    // controller returns JSON only on authentification; on deconnexion it doesn't in the example.
                    // treat 200 as success.
                    if (!res.ok) {
                        const err = json.error || json.message || 'Erreur lors de la déconnexion';
                        throw new Error(err);
                    }
                    return json;
                })
                .then(_ => {
                    showMessage('Déconnecté.', 'success');
                    clearEmploye();
                })
                .catch(err => {
                    // even if backend didn't return JSON, try to show a plain message
                    showMessage(err.message || 'Erreur lors de la déconnexion', 'error');
                });
            });
        })();
    </script>
</body>
</html></form>