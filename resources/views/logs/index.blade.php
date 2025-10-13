@extends('layouts.app')

@section('title', 'Stock Logs')

@section('content')
<div class="container">
    <h1 class="mb-4">Stock Logs</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Log ID</th>
                            <th>Item</th>
                            <th>Change</th>
                            <th>Action</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs->groupBy('batch_id') as $batch)
                            @php $first = $batch->first(); @endphp
                            <tr>
                                <td>{{ $first->batch_id }}</td>
                                <td>{{ $first->item_name_snapshot ?? 'Deleted Item' }}</td>
                                <td>
                                    @if($first->quantity > 0)
                                        <span class="text-success">+{{ $first->quantity }}</span>
                                    @elseif($first->quantity < 0)
                                        <span class="text-danger">{{ $first->quantity }}</span>
                                    @else
                                        0
                                    @endif
                                </td>
                                <td>
                                    {{ $first->action }}
                                    @if($batch->count() > 1)
                                        <a href="#" class="ml-2 toggle-batch" data-target="batch-{{ $first->batch_id }}">[+]</a>
                                        <div id="batch-{{ $first->batch_id }}" class="d-none mt-1 ml-3">
                                            @foreach($batch as $log)
                                                <div>{{ $log->action }}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $first->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggle-batch').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.getElementById(this.dataset.target);
            if (target) {
                target.classList.toggle('d-none');
                this.textContent = target.classList.contains('d-none') ? '[+]' : '[-]';
            }
        });
    });
});
</script>
@endsection
