<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Categories List </h3>
        </div>
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if(session()->has('success'))
                            <p>{{session('success')}}</p>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @isset($categories)
                                    @forelse($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>
                                                <a href="{{route('admin.edit_category',$category->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="" wire:click.prevent="delete('{{$category->id}}')" class="btn btn-sm btn-danger">Delete</a>
                                                <a href="" wire:click.prevent="toggleFeatured({{$category->id}})" class="btn btn-sm btn-primary">
                                                    @if($category->is_featured == 1) UnFeatured @else Featured @endif
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="5">No Data Found</td>
                                    @endforelse
                                @endisset

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>

