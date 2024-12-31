@extends('layouts.admaster')

@section('content')
    <div class="container-fluid">
        <h2 class="mb-4">Orders Page</h2>
        <div class="px-5">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex flex-column justify-content-end align-items-end mb-3">
                        <form class="d-flex fs-6" method="GET" action="{{ route('orders.index') }}" role="search">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search"
                                aria-label="Search" value="{{ request('search') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>


                    <table class="table table-bordered table-striped mt-1">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama Barang</th>
                                <th>Detail</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="text-center">
                                        {{ $no++ }}
                                    </td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach ($order->orderDetails as $detail)
                                                <li>{{ $detail->busana->nama_busana }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach ($order->orderDetails as $detail)
                                                <li>{{ $detail->jumlah }} pcs x Rp.
                                                    {{ number_format($detail->harga, 0, ',', '.') }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $order->status_pesanan }}</td>
                                    <td class="text-center">
                                        {{-- EDIT --}}
                                        <a href="#" class="text-white" data-bs-toggle="modal"
                                            data-bs-target="#authModal{{ $order->id }}">
                                            <i class="bi bi-pencil btn btn-info btn-sm"></i>
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="authModal{{ $order->id }}" tabindex="-1"
                                            aria-labelledby="orderDetailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content shadow-lg border-0">
                                                    <div class="modal-header bg-primary text-white">
                                                        <h5 class="modal-title" id="orderDetailModalLabel">Detail Pesanan
                                                        </h5>
                                                        <button type="button" class="btn-close btn-close-white"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Nama Pelanggan</th>
                                                                    <td>{{ $order->customer->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tanggal Pesanan</th>
                                                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td>{{ $order->status_pesanan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="2">Items</th>
                                                                </tr>
                                                                @foreach ($order->orderDetails as $detail)
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            {{ $detail->busana->nama_busana }} -
                                                                            {{ $detail->jumlah }} pcs x Rp.
                                                                            {{ number_format($detail->harga, 0, ',', '.') }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <th>Total</th>
                                                                    <td>Rp.
                                                                        {{ number_format($order->total_belanja, 0, ',', '.') }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-between">
                                                        <small class="text-muted">* Pastikan status sudah sesuai sebelum
                                                            mengupdate.</small>
                                                        <form method="POST"
                                                            action="{{ route('orders.updateStatus', $order->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="input-group">
                                                                <select class="form-select" name="status_pesanan"
                                                                    id="status_pesanan">
                                                                    <option value="Pending"
                                                                        {{ $order->status_pesanan == 'Pending' ? 'selected' : '' }}>
                                                                        Pending
                                                                    </option>
                                                                    <option value="Diproses"
                                                                        {{ $order->status_pesanan == 'Diproses' ? 'selected' : '' }}>
                                                                        Diproses
                                                                    </option>
                                                                    <option value="Selesai"
                                                                        {{ $order->status_pesanan == 'Selesai' ? 'selected' : '' }}>
                                                                        Selesai
                                                                    </option>
                                                                    <option value="Dibatalkan"
                                                                        {{ $order->status_pesanan == 'Dibatalkan' ? 'selected' : '' }}>
                                                                        Dibatalkan
                                                                    </option>
                                                                </select>
                                                                <button type="submit" class="btn btn-primary">Update
                                                                    Status</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- HAPUS --}}
                                        <form id="delete-form-{{ $order->id }}"
                                            action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $order->id }})">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <hr>
                    {{ $orders->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var orderDetailModal = document.getElementById('authModal');
            orderDetailModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var order = button.getAttribute('data-order');
                order = JSON.parse(order);

                var modalTitle = orderDetailModal.querySelector('.modal-title');
                var modalBody = orderDetailModal.querySelector('.modal-body #orderDetailsContent');
                var updateStatusForm = orderDetailModal.querySelector('#updateStatusForm');

                modalTitle.textContent = 'Detail Pesanan #' + order.id;
                modalBody.innerHTML = `
                <p><strong>Nama Pelanggan:</strong> ${order.customer.name}</p>
                <p><strong>Tanggal Pesanan:</strong> ${new Date(order.created_at).toLocaleDateString()}</p>
                <p><strong>Status:</strong> ${order.status_pesanan}</p>
                <h5>Items:</h5>
                <ul>
                    ${order.order_details.map(detail => `
                                                                                                                    <li>${detail.busana.nama_busana} - ${detail.jumlah} pcs x Rp. ${detail.harga.toLocaleString('id-ID')}</li>
                                                                                                                `).join('')}
                </ul>
                <p><strong>Total:</strong> Rp. ${order.total_belanja.toLocaleString('id-ID')}</p>
            `;

                updateStatusForm.action = `/orders/${order.id}/update-status`;
                document.getElementById('status_pesanan').value = order.status_pesanan;
            });
        });
    </script>
    <script>
        function confirmDelete(orderId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Order akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + orderId).submit();
                }
            });
        }

        @if (session('created'))
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            // Tampilkan toast dengan pesan dari session
            Toast.fire({
                icon: "success",
                title: "{{ session('created') }}"
            });
        @endif
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        @endif
    </script>
@endpush
