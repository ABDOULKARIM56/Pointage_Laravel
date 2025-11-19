<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Ajouter un employé</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input class="form-control mb-2" placeholder="Nom" />
                    <input class="form-control mb-2" placeholder="Prénom" />
                    <input class="form-control mb-2" placeholder="Matricule" />
                    <input class="form-control mb-2" placeholder="Email" />
                    <select class="form-select mb-2">
                        <option>Fonction</option>
                        <option>Technicien</option>
                        <option>Comptable</option>
                    </select>
                    <button class="btn btn-primary w-100">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewEmployeeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Détails de l'employé</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                {{-- Ces données seraient normalement remplies par Laravel/Ajax --}}
                <p><b>Nom :</b> Diallo</p>
                <p><b>Prénom :</b> Salimatou</p>
                <p><b>Matricule :</b> A102</p>
                <p><b>Email :</b> salimatou@techniger.com</p>
                <p><b>Nationalité :</b> Nigérienne</p>
                <p><b>Genre :</b> Féminin</p>
                <p><b>État Civil :</b> Célibataire</p>
                <p><b>Numéro :</b> +227 90 11 22 33</p>
                <p><b>Adresse :</b> Niamey, Plateau</p>
                <p><b>Rôle :</b> Comptable</p>
                <p><b>Date Naissance :</b> 12/06/1997</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="manualPointageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Pointage Manuel</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input class="form-control mb-3" placeholder="Badge ID" />
                    <input type="time" class="form-control mb-3" placeholder="Heure de pointage" />
                    <select class="form-select mb-3">
                        <option>Entrée</option>
                        <option>Sortie</option>
                    </select>
                    <button class="btn btn-primary w-100">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>