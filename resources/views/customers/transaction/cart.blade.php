@extends('layouts.custmaster')

@section('content')
<div class="text-center mb-4">
    <h2 class="fw-bold">Keranjang</h2>
</div>

<!-- Step Navigation -->
<div class="d-flex justify-content-center mb-5">
    <div class="text-center mx-3">
        <span class="fw-bold">1</span>
        <p>Keranjang Belanja</p>
    </div>
    <div class="text-center mx-3 text-muted">
        <span class="fw-bold">2</span>
        <p>Detail Checkout</p>
    </div>
    <div class="text-center mx-3 text-muted">
        <span class="fw-bold">3</span>
        <p>Pesanan Selesai</p>
    </div>
</div>

<div class="row">
    <!-- Produk Section -->
    <div class="col-lg-8 mb-4">
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th class="text-center">Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $key => $item)
                    <tr>
                        <td>
                            <input type="hidden" name="cart[{{ $key }}][name]" value="{{ $item['name'] }}">
                            <div class="d-flex align-items-center">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="me-3" style="width: 60px; height: 60px;">
                                <span>{{ $item['name'] }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-group" data-price="{{ $item['price'] }}">
                                <button type="button" class="btn btn-outline-secondary decrease">-</button>
                                <input type="number" name="cart[{{ $key }}][quantity]" class="form-control text-center quantity" value="{{ $item['quantity'] }}" min="1">
                                <button type="button" class="btn btn-outline-secondary increase">+</button>
                            </div>
                        </td>
                        <td>
                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                            <input type="hidden" name="cart[{{ $key }}][price]" value="{{ $item['price'] }}">
                        </td>
                        <td class="total">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-dark">Update Keranjang</button>
        </form>
    </div>

    <!-- Ringkasan Section -->
    <div class="col-lg-4">
        <div class="card p-4">
            <h5 class="fw-bold">Ringkasan Keranjang</h5>
            <form action="{{ route('checkout.index') }}" method="GET">
                <div class="form-check mt-3">
                    <input class="form-check-input" type="radio" name="shipping" id="standard" value="0" checked>
                    <label class="form-check-label" for="standard">Standard (Gratis)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping" id="fast" value="10000">
                    <label class="form-check-label" for="fast">Pengiriman Cepat (Rp 10.000)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping" id="pickup" value="0">
                    <label class="form-check-label" for="pickup">Ambil di Tempat</label>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span>Total:</span>
                    <span id="grand-total">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                </div>
                <button type="submit" class="btn btn-dark w-100 mt-3">Checkout</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const updateTotal = () => {
            let grandTotal = 0;

            document.querySelectorAll('.input-group').forEach(group => {
                const quantityInput = group.querySelector('.quantity');
                const totalCell = group.closest('tr').querySelector('.total');
                const price = parseInt(group.dataset.price);
                const quantity = parseInt(quantityInput.value);

                const total = price * quantity;
                totalCell.textContent = 'Rp ' + total.toLocaleString('id-ID');
                grandTotal += total;
            });

            document.getElementById('grand-total').textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');
        };

        document.querySelectorAll('.decrease').forEach(button => {
            button.addEventListener('click', () => {
                const quantityInput = button.nextElementSibling;
                let value = parseInt(quantityInput.value);
                if (value > 1) {
                    quantityInput.value = value - 1;
                    updateTotal();
                }
            });
        });

        document.querySelectorAll('.increase').forEach(button => {
            button.addEventListener('click', () => {
                const quantityInput = button.previousElementSibling;
                let value = parseInt(quantityInput.value);
                quantityInput.value = value + 1;
                updateTotal();
            });
        });

        updateTotal();
    });
</script>
@endsection
