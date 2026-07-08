@extends('tablar::page')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">

<div class="page-body">
    <div class="container-xl">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="page-title font-bold text-dark mb-1">Admin Review Moderation</h2>
                <p class="text-muted text-sm mb-0">Approve or reject customer review entries securely.</p>
            </div>
            <a href="/dashboard" class="btn btn-outline-secondary rounded-pill">
                <i class="ti ti-arrow-left me-2"></i> Back to Dashboard
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-important alert-success alert-dismissible shadow-sm mb-4 border-0" role="alert" style="border-radius: 12px;">
                <div class="d-flex">
                    <div><i class="ti ti-check fs-2 me-2"></i></div>
                    <div>{{ session('success') }}</div>
                </div>
            </div>
        @endif

        <div class="row row-cards mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                    <div class="card-header bg-transparent border-0 pt-4 px-4">
                        <h3 class="card-title font-bold text-warning d-flex align-items-center gap-2">
                            <i class="ti ti-clock fs-2"></i> Pending Reviews Queue
                            <span class="badge bg-warning text-white ms-2">{{ count($pendingReviews) }}</span>
                        </h3>
                    </div>
                    
                    <div class="card-body px-4 pb-4">
                        @forelse($pendingReviews as $review)
                            <div class="p-4 border border-slate rounded-3 mb-3 bg-light-style transition-all shadow-hover">
                                <div class="row align-items-center g-3">
                                    <div class="col-md-8">
                                        <div class="mb-2">
                                            <span class="text-xs font-bold uppercase text-muted me-2">Product Target:</span>
                                            <span class="font-semibold text-dark">{{ $review->product_name }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <span class="text-xs font-bold uppercase text-muted me-2">Review Content:</span>
                                            <span class="text-secondary">"{{ $review->review_text ?: 'No narrative review content provided.' }}"</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            @php
                                                $ratingValue = DB::table('ratings')->where('rateable_id', $review->id)->value('rating') ?? 5;
                                            @endphp
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="ti {{ $i <= $ratingValue ? 'ti-star-filled text-warning' : 'ti-star text-muted' }} fs-3"></i>
                                            @endfor
                                            <span class="text-muted text-xs ms-2">({{ $ratingValue }} / 5 Stars)</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-md-end">
                                        <div class="d-inline-flex gap-2">
                                            <form method="POST" action="/admin/reviews/{{ $review->id }}/approve">
                                                @csrf
                                                <button type="submit" class="btn btn-success rounded-pill px-3">
                                                    <i class="ti ti-check me-1"></i> Approve
                                                </button>
                                            </form>
                                            <form method="POST" action="/admin/reviews/{{ $review->id }}/reject">
                                                @csrf
                                                <button type="submit" class="btn btn-danger rounded-pill px-3" onclick="return confirm('Permanently drop this review entry?')">
                                                    <i class="ti ti-trash me-1"></i> Reject
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5 text-muted">
                                <i class="ti ti-mood-smile fs-1 mb-2 d-block opacity-40"></i>
                                <p class="mb-0 font-medium">All clear! No reviews require configuration updates.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .bg-light-style {
        background-color: #f8fafc;
    }
    .border-slate {
        border-color: #e2e8f0 !important;
    }
    .shadow-hover:hover {
        box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05);
        border-color: #cbd5e1 !important;
    }
    .fs-2 {
        font-size: 1.4rem !important;
    }
</style>
@endsection