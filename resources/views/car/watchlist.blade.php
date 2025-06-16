<x-app-layout title="watchlist">
    <main>
        <section>
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>My Favourite Cars</h2>
                    <div>
                        Showing {{ $cars->firstItem() }} to {{ $cars->lastItem() }} of {{ $cars->total() }}
                    </div>
                </div>
                <div class="car-items-listing">
                    @foreach ($cars as $car)
                        <x-car-item :car="$car" :isInWatchlist="true" />
                    @endforeach
                </div>
                {{ $cars->onEachSide(1)->links() }}
            </div>
        </section>
    </main>
</x-app-layout>
