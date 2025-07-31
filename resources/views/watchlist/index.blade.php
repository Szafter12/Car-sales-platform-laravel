<x-app-layout title="watchlist">
    <main>
        <section>
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="fs-3 mb-5">My Favourite Cars</h1>
                    <div>
                        Showing {{ $cars->firstItem() }} to {{ $cars->lastItem() }} of {{ $cars->total() }}
                    </div>
                </div>
                <div class="car-items-listing">
                    @foreach ($cars as $car)
                        <x-car-item :car="$car" :isInWatchlist="true" />
                    @endforeach
                </div>

                @if ($cars->count() === 0)
                    <div class="text-center p-4 fs-5">You dont have any favourite cars</div>
                @endif

                {{ $cars->onEachSide(1)->links() }}
            </div>
        </section>
    </main>
</x-app-layout>
