@extends('layouts.rating')
@section('content')
<style>
    .fa.fa-star{
        color:yellow;   
    }
</style>
<div class="card mb-4">
    <div class="card-body">
        <form action="{!! route('rating.upload') !!}" method="POST" enctype="multipart/form-data">
            @csrf
            <table align="center" class="table table">
                <tr>
                    <td>Rating</td>
                    <td>
                        <select name="rating" id="example">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsi" required="required"</td>
                </tr>
                <tr>
                    <td>Gambar:</td>
                    <td><input type="file" name="image" id="image" required="required"></td>
                </tr>
            </table>
            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="jquery.barrating.min.js"></script>
<script type="text/javascript">
    $(function() {
      $('#example').barrating('show'{
  theme: 'my-awesome-theme'});
   });
</script>

@endsection