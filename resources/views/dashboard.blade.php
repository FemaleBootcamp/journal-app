@extends('layout.welcome')
@section('content')

<div class="container text-center">
    <section>
        <div class="row">
            <h4 class="mt-5 col-6 text-center text-white">{{ $user -> name }}'s <span>Journal</span> </h4>
            <h4 class="mt-5 col-6 text-center text-white"><span><i class="fa fa-filter"></i> Filter</span> </h4>
        </div>
    </section>
    <section>
            <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Goal for tomorrow</th>
            <th scope="col">Achievment</th>
            <th scope="col">Grade for the day</th>
            <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
                <td>21.12.2018</td>
                <td>Finish work</td>
                <td><!-- Default unchecked -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                        <label class="custom-control-label" for="defaultUnchecked">Did you achieve?</label>
                    </div>
                </td>
                <td>A</td>
                <td>
                    <button type="button" class="btn btn-light">View Details</button>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>

            </tr>
            
        </tbody>
        </table>
            
    </section>
</div>
@endsection