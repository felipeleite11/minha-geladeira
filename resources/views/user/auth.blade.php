@extends('layouts/auth')

@section('store')

    <div class="row d-flex align-items-center" style="height: 70vh">
        <div class="col-md">
            <form action="/session" method="POST" class="animate__animated animate__fadeInUp animate__faster">
                @csrf

                <div class="col-md-4 offset-md-4">
                    <h4>Login</h4>
                </div>

                <div class="col-md-4 offset-md-4">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                        <input type="email" class="form-control" name="login" required value="felipe@email.com">
                    </div>
                </div>

                <div class="col-md-4 offset-md-4">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                        <input type="password" class="form-control" name="password" required value="123456">
                    </div>
                </div>

                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-success">Enter</button>
                </div>

            </form>
        </div>
    </div>

@endsection
