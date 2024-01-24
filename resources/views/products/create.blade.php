@extends('layouts.app')
@section('content')
<main class="container">
    <section>
        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="titlebar">
                <h1>Add Product</h1>
                <button>Save</button>
            </div>
            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            @endif
            <div class="card">
               <div>
                    <label>Name</label>
                    <input type="text" name="name">
                    <label>Description (optional)</label>
                    <textarea cols="10" rows="5" name="description"></textarea>
                    <label>Add Image</label>
                    <img src="" alt="" class="img-product" id="file-preview" />
                    <input type="file" name="image" accept="image/*" onchange="showFile(event)" >
                </div>
               <div>
                    <label>Category</label>
                    <select  name="category" >
                        @foreach (json_decode('{"Smartphone" : "Smartphone" ,"Smart TV":"Smart TV",
                        "Computer" : "Computer" }',true) as $optionKey => $optionValue )
                          <option value="{{ $optionKey }}" >{{ $optionValue }}</option>
                        @endforeach

                    </select>
                    <hr>
                    <label>Inventory</label>
                    <input type="text" name="quantity" >
                    <hr>
                    <label>Price</label>
                    <input type="text" name="price" >
               </div>
            </div>
            <div class="titlebar">
                <h1></h1>
                <button>Save</button>
            </div>
        </form>
        </section>
</main>
<script type="text/javascript">
function showFile(event){
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        var dataURL = reader.result;
        var output = document.getElementById('file-preview');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);

}
</script>

@endsection
