@extends('tablar::page')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">

<div class="page-body">
    <div class="container-xl">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="page-title font-bold text-dark mb-1">Dynamic Menu & Sidebar Manager</h2>
                <p class="text-muted text-sm mb-0">Manage your sidebar navigation links and order dynamically.</p>
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

        <div class="row row-cards">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                    <div class="card-header bg-transparent border-0 pt-4 px-4">
                        <h3 class="card-title font-bold text-dark">Add Navigation Link</h3>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <form action="/admin/menu-manager" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label font-semibold">Menu Title</label>
                                <input type="text" name="title" class="form-control rounded-2" placeholder="e.g. Products" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-semibold">URL Route Path</label>
                                <input type="text" name="url" class="form-control rounded-2" placeholder="e.g. /products" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-semibold">Tabler Icon Class</label>
                                <input type="text" name="icon" class="form-control rounded-2" placeholder="e.g. ti ti-package">
                            </div>
                            <div class="mb-4">
                                <label class="form-label font-semibold">Display Sequence Order</label>
                                <input type="number" name="order" class="form-control rounded-2" value="0" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-full rounded-pill py-2 font-bold">
                                <i class="ti ti-plus me-1"></i> Save Menu Item
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                    <div class="card-header bg-transparent border-0 pt-4 px-4">
                        <h3 class="card-title font-bold text-dark">Active Sidebar Navigation Structure</h3>
                    </div>
                    <div class="table-responsive p-2">
                        <table class="table card-table table-vcenter text-nowrap table-borderless">
                            <thead>
                                <tr class="text-muted text-uppercase tracking-wider text-xs border-bottom">
                                    <th>Order</th>
                                    <th>Title</th>
                                    <th>URL Path</th>
                                    <th>Icon Graph</th>
                                    <th class="text-end">Action Management</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menus as $menu)
                                <tr class="border-bottom-subtle">
                                    <td><span class="badge bg-slate-lt font-bold px-2 py-1 rounded">{{ $menu->order }}</span></td>
                                    <td class="font-semibold text-dark">{{ $menu->title }}</td>
                                    <td class="text-secondary">{{ $menu->url }}</td>
                                    <td><i class="{{ $menu->icon }} fs-2 text-primary"></i></td>
                                    <td class="text-end">
                                        <a href="/admin/menu-manager/delete/{{ $menu->id }}" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Permanently remove this navigation item from sidebar?')">
                                            <i class="ti ti-trash me-1"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .border-bottom-subtle {
        border-bottom: 1px solid #f1f5f9;
    }
    .bg-slate-lt {
        background-color: #f1f5f9;
        color: #475569;
    }
    .fs-2 {
        font-size: 1.3rem !important;
    }
</style>
@endsection