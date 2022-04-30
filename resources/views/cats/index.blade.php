<!DOCTYPE html>
<html>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title> cats here</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</html>
<body>
    <div class="container">
        <h1 class="mt-2">cats</h1>
        <x-flash-msg />
        <a class="my-2" href="{{ url('cats/create')}}">add cats +</a>
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
                            <a href="{{ url('cats/edit/' . $cat->id) }}" class="btn btn-primary"> edit</a>
                            <form action="{{ url('cats/delete/' . $cat->id) }}" method="post">
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
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>