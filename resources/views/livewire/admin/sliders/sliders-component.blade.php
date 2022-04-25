<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Sliders List </h3>
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
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>link</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @isset($sliders)
                                    @forelse($sliders as $slider)
                                        <tr>
                                            <td>{{$slider->id}}</td>
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->sub_title}}</td>
                                            <td>{{$slider->link}}</td>
                                            <td>{{$slider->price}}</td>
                                            <td>{{$slider->sliderStatus()}}</td>
                                            <td>
                                                <img src="{{asset('assets/images/sliders/'.$slider->image)}}" width="60">
                                            </td>
                                            <td>
                                                <a href="{{route('admin.edit_slider',$slider->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="" wire:click.prevent="delete('{{$slider->id}}')" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="5">No Data Found</td>
                                    @endforelse
                                @endisset

                                </tbody>
                            </table>

                            {{$sliders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>

