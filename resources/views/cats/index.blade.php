<x-back-end-layout>
    <div class="white-box">

    <h1 class="box-title mt-2">cats</h1>
    <x-flash-msg />
    <p class="text-muted">
        <a class="my-2" href="{{ route('admin.cats.create')}}">add cats +</a>
    </p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($cats as $cat )
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->parent_id}}</td>
                        <td>{{$cat->created_at}}</td>
                        <td>
                            <a href="{{ route('admin.cats.edit' , $cat->id) }}" class="btn btn-primary"> edit</a>
                            <form action="{{ route('admin.cats.destroy' , $cat->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"> delete</bu>

                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    {{ $cats->links() }}
   </div>
</x-back-end-layout>
  
