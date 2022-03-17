<form action="{{route($route,$id)}}" method="POST" >
     @csrf
    @method('delete')
    <button type="submit" class="btn btn-link" title="elimina">
        <i class="fa-regular fa-trash-can"></i>
    </button>
</form>