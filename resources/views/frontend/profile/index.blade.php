<x-front-end-layout>
   <div class="container">
       <div class="p-10 my-3" style="padding:25px; margin:45px 0">
        <h1 class="text-center"> Edit your profile</h1>

       <form method="POST" action="{{ route('profile.update')}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <x-form.input name="name" label="Name" :value="$profile->name" />
            </div>

            <div class="col-md-6">
                <x-form.input name="title" label="Title" :value="$profile->title" />
            </div>

            <div class="col-md-6">
                <x-form.input name="birthday" label="Birthday" type="date" value="date('YYYY-MM-DD', strtotime($profile->birthday));" />
            </div>

            <div class="col-md-6">
                <x-form.select name="gender" label="Gender" :array="['male' , 'femmale']" selected="$profile->gender" />
            </div>

    

            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary my-2">submit</button>
                </div>
            </div>
        </div>
      </form>
    </div>
   </div>

</x-front-end-layout>