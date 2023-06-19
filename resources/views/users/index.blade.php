@extends('layouts.app')

@section('title', 'Employee List')

@section('content')



        <div class="row gx-5">
            <div class="col-5 mt-7">
                <img src="{{ asset('img/team-foto.jpeg') }}" alt="team photo" class="img-fluid mb-4" style="weight:30%; margin-top: 38px">
    
                <h1 class="mb-1">SEARCH OUR<br>EMPLOYEE</h1>
    
                <hr class="text-secondary">
        
                <div class="mt-3 ms-auto">
                    <form action="{{ route('user.search') }}">
                        @csrf
    
                        <div class="row gx-2">
                            <div class="col mb-2 mt-2">
                                <input type="search" name="search" id="search" class="form-control form-control-sm " placeholder="Search..." autofocus>
                            </div>
                            <div class="col-auto mt-2">
                                <button type="submit" class="btn btn-outline-secondary py-1"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <hr class="text-secondary">

                <div>
                    <h3 class="text-start">CONTACT US</h3>
                    <table class="table table-small align-center mt-3 border">
                        <thead class="table-secondary text-center">
                            <tr>
                                <td>DEPARTMENT</td>
                                <td>EXTENSION NUMBER</td>
                                <td>FLOOR</td>
                            </tr>
                        </thead>
                        <tbody class="text-end">
                            <tr>
                                <td>Administration Department</td>
                                <td>#1</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Human Resource Division</td>
                                <td>#2</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Legal Department</td>
                                <td>#3</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Accounting Department</td>
                                <td>#4</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Marketing Department</td>
                                <td>#5</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td>Public Relations Department</td>
                                <td>#6</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>Business Department</td>
                                <td>#7</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <td>Office of the President</td>
                                <td>#10</td>
                                <td>10</td>
                            </tr>
                        </tbody>
                    </table>     
                </div>       
                <div class="mt-3">
                    <hr class="text-secondary">
                    <h5>
                        <i class="fa-solid fa-map-location-dot"></i> ADRESS
                    </h5>
                    <p class="text-end">1-1 nakagyoku Kyoto, Japan</p>
                    <hr class="text-secondary">
                </div>
            </div>
        
            <div class="col-7">
                <h3 class="text-center mb-3 mt-5">EMPLOYEE LIST</h3>
    
                <table class="table table-hover align-middle border">
                    <thead class="small fw-bold text-center table-primary">
                        <tr>
                            <th>NAME</th>
                            <th>DEPARTMENT</th>
                            <th>SALARY</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($all_users as $user)  
                        <tr> 
                            <td>{{ ucfirst($user->name) }}</td>
                            <td>{{ $user->department }}</td>
                            <td>{{ $user->salary }}</td>
                            <td>
                                @if (Auth::user()->id === $user->id)
                                {{-- Edit --}}
                                    <a  href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-warning px-2 me-2"><i class="fa-solid fa-pen"></i></a>
                                {{-- destroy --}}    
                                    <button class="btn btn-outline-danger px-2 me-2" data-bs-toggle="modal" data-bs-target="#delete-user-{{ $user->id }}"><i class="fa-solid fa-trash-can"></i></button>
                                    @include('users.modal.delete')     
                                @else
                                    <button class="btn btn-outline-primary px-3" data-bs-toggle="modal"
                                        data-bs-target="#user-details-{{ $user->id }}"> Details </button>   
                                @endif           
                            @include('users.modal.details')  
                        
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table> 
                <div class="d-flex justify-contet-center ms-4">
                    {{ $all_users->links() }}
                </div> 
                
                <div class="col-auto ms-6 text-center">
                    <hr class="text-secondary">
                    <h3 class="mt-4 mb-2">Employee Referral System</h3>
                    <br>
                    <p class="text-muted">The company has an employee referral program</p>
                    <p class="text-muted">that allows employee to refer friends and </p>
                    <p class="text-muted">acquaintances to experienced hires.</p>

                    <hr class="text-secondary">
                    <p class="text-muted">If you would like to make a referral, please call here</p>
                    <table class="table table-success">
                        <tr class="text-center">
                            <td>2F</td>
                            <td>Human Resource Division</td>
                            <td><i class="fa-solid fa-user-tie me-2"></i>Jhon
                            <td><i class="fa-solid fa-phone me-2"></i> #2</td>
                        </tr>
                    </table>
                    
                    <img src="{{ asset('img/staff.jpeg') }}" alt="staff photo" class="img-fluid mt-3" style="weight:50%; margin-top: 38px">
                </div>

                <div class="col-auto ms-6 mt-2 text-center">
                    <hr class="text-secondary">
                    <h4 class="mt-4">INFORMATION</h4>
                    <hr class="text-secondary">
                    <table class="table table-border mt-1">
                        <thead class="table-warning">
                            <tr>
                                <td>DATE</td>
                                <td class="text-center">Information</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jan.20</td>
                                <td>We will BBQ in Kamogawa river. If you have a time, please join us!</td>
                            </tr>
                            <tr>
                                <td>Jan.15</td>
                                <td>NO OVERTIME DAYS</td>
                            </tr>
                            <tr>
                                <td>Jan.1</td>
                                <td>Server will be unaible from 7am to 8am due to server maintenance</td>
                            </tr>
                            <tr>
                                <td>May.28</td>
                                <td>We offer TOEIC preparation classes
                                    <br>start: 16:00~17:00   Place 4F Conference room
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    



    
@endsection