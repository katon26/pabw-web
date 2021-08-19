@extends('layouts.app2')

@section('title', 'Daftar')

@section('content')
                <section id="userpage">
                  <div class="userpage-container">
                    <div class="userform card-header">
                      <h2 class="h3 text-center m-0 font-weight-light">Daftar</h2>
                    </div>


                    <form class="card shadow p-5 border-top-primary" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label"><i class="fa fa-user" aria-hidden="true"></i></label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Nama Lengkap" class="form-control form-control-akun @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label"><i class="fa fa-envelope" aria-hidden="true"></i></label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Alamat email" class="form-control form-control-akun @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label"><i class="fa fa-key" aria-hidden="true"></i></label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Kata sandi" class="form-control form-control-akun @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-2 col-form-label"><i class="fa fa-unlock-alt" aria-hidden="true"></i></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="Konfirmasi kata sandi" class="form-control form-control-akun" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mb-0">
                                <button type="submit" class="btn btn-get-started">
                                    {{ __('Daftar') }}
                                </button>
                        </div>

                    </form>
                  </div>
                </section>
@endsection
