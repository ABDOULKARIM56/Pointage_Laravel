<!-- Bouton pour ouvrir le modal -->
<!-- button@foreach ($items as $item) -->

    <!-- Modal -->
    <div class="modal fade" id="detailModal{{ $detail->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $detail->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel{{ $detail->id }}">Détails de {{ $detail->nom }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nom :</strong> {{ $detail->nom }}</p>
                    <p><strong>Description :</strong> {{ $detail->description }}</p>
                    <!-- ajoute d'autres champs si nécessaire -->
                </div>
                <div class="modal-footer">
                    <form action="{{ route('show_departement' ) }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit">Fermer</button>
                    </form>                </div>
            </div>
        </div>
    </div>
<!-- buttonn@endforeach -->
