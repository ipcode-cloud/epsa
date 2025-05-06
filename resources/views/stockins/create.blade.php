@extends('layouts.app')
@section('content')
    <div class="w-full h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">StockOut</h1>
        
        <form action="">
            <div class="mb-4">
                <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2">Select Product:</label>
                <input type="text" name="product_name" id="product_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Product Name" required>
            </div>
                <div class="mb-4">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Quantity" required>
            </div>
                <div class="mb-4">
                <label for="unitPrice">Unit Price</label>
                <input type="text" name="unitPrice" id="unitPrice" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Unit Price" required>
            </div>
                <div class="mb-4">
                <label for="totalPrice">Total Price</label>
                <input type="text" name="totalPrice" id="totalPrice" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Total Price" required>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <button type="submit">Add Product</button>
        </form>

    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productSelect = document.getElementById('product_name');
            const quantityInput = document.getElementById('quantity');
            const unitPriceInput = document.getElementById('unitPrice');
            const totalPriceInput = document.getElementById('totalPrice');

            productSelect.addEventListener('change', function() {
                // Fetch product details based on selected product
                const selectedProductId = this.value;
                fetch(`/products/${selectedProductId}`)
                    .then(response => response.json())
                    .then(data => {
                        unitPriceInput.value = data.unit_price;
                        totalPriceInput.value = data.total_price;
                    });
            });
        });
    </script>




        