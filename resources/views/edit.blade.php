<form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
    @method('PUT')
    <h2>Edit product</h2>
    <p type="Name:"> <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name" required></p>
    <p type="Details:"> <input type="text" name="desc" value="{{ $product->desc }}" class="form-control" placeholder="Details" required></p>
    <p type="Price:"> <input type="number" name="price" class="form-control" placeholder="price" value="{{ $product->price }}" required></p>
    <p><img src="{{ url('public/Image/'.$product->img) }}" style="height: 100px;width: 20%;" alt="">
        <label for="files"title="Click Me"  >Select Image</label>

        <input id="files" style="visibility:hidden;" type="file" name="img" class="btn" ></p>
  
    <button type="submit" class="btn btn-primary ml-3">Submit</button>

</form>
<style>
    body {
        background: #59ABE3;
        margin: 0
    }

    .form {
        width: 340px;
        height: 550px;
        background: #e6e6e6;
        border-radius: 8px;
        box-shadow: 0 0 40px -10px #000;
        margin: calc(50vh - 220px) auto;
        padding: 20px 30px;
        max-width: calc(100vw - 40px);
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
        position: relative
    }

    h2 {
        margin: 10px 0;
        padding-bottom: 10px;
        width: 180px;
        color: #78788c;
        border-bottom: 3px solid #78788c
    }

    input {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        background: none;
        outline: none;
        resize: none;
        border: 0;
        font-family: 'Montserrat', sans-serif;
        transition: all .3s;
        border-bottom: 2px solid #bebed2
    }

    input:focus {
        border-bottom: 2px solid #78788c
    }

    p:before {
        content: attr(type);
        display: block;
        margin: 28px 0 0;
        font-size: 14px;
        color: #5a5a5a
    }

    button {
        float: right;
        padding: 8px 12px;
        margin: 8px 0 0;
        font-family: 'Montserrat', sans-serif;
        border: 2px solid #78788c;
        background: 0;
        color: #5a5a6e;
        cursor: pointer;
        transition: all .3s
    }

    button:hover {
        background: #78788c;
        color: #fff
    }

    div {
        content: 'Hi';
        position: absolute;
        bottom: -15px;
        right: -20px;
        background: #50505a;
        color: #fff;
        width: 320px;
        padding: 16px 4px 16px 0;
        border-radius: 6px;
        font-size: 13px;
        box-shadow: 10px 10px 40px -14px #000
    }

    span {
        margin: 0 5px 0 15px
    }
</style>
<script>
$("#files").change(function() {
  filename = this.files[0].name;
  console.log(filename);
});</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>