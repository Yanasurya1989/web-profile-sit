@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Kelola Section</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <ul id="sortable" class="list-group">
            @foreach ($sections as $section)
                <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $section->id }}">
                    {{ $section->name }}
                    <div>
                        <form action="{{ route('admin.section.toggle', $section->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-sm {{ $section->is_active ? 'btn-success' : 'btn-secondary' }}">
                                {{ $section->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- jQuery & jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <script>
        $(function() {
            $("#sortable").sortable({
                update: function(event, ui) {
                    let order = {};
                    $("#sortable li").each(function(index) {
                        order[$(this).data('id')] = index;
                    });

                    $.post("{{ route('admin.section.updateOrder') }}", {
                        _token: "{{ csrf_token() }}",
                        order: order
                    }, function(data) {
                        if (data.success) {
                            console.log('Order updated');
                        }
                    });
                }
            });
        });
    </script>
@endsection
