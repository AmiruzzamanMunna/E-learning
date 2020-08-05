@extends('Layouts.admin-home')
@section('title')
    Lecture Add
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Course</div>
                <div class="col-md-1 ml-auto">
                   
                    
                </div>
            </div>
        </div>
        <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Lecture Name</label>
                    <input type="text" name="contentname" id="contentname" value="{{old('contentname')}}" class="form-control">   
                       
                                
                </div>
                <div class="form-group">
                    <label for="">Lecture Short Discription</label><br><br><br>
                    <textarea id="udescription" name="udescription" cols="48" rows="10">{{old('udescription')}}</textarea>  
                                
                </div>
                <div class="form-group">
                    <label for="">Lecture Video Title</label>
                    <input type="text" class="form-control" name="lecturevideotitle" value="{{old('lecturevideotitle')}}">  
                                
                </div>
                <div class="form-group">
                    <label for="">Lecture Video</label>
                    <input type="file" class="form-control" value="{{old('lectureVideo')}}" name="lectureVideo">  
                                
                </div>
                <div class="form-group">
                    <label for="">Lecture Video Poster</label>
                    <input type="file" class="form-control" value="{{old('lectureVideoposter')}}" name="lectureVideoposter" id="">  
                                
                </div>
                <div class="form-group">
                    <label for="">Lecture Video Summary</label><br><br><br>
                    <textarea id="udescription" name="videosummary" cols="48" rows="10">{{old('videosummary')}}</textarea>         
                </div>
                <div class="form-group">
                    <label for="">Lecture Video Excercise</label><br><br><br>
                    <textarea name="videoexcercise" cols="48" rows="10">{{old('videoexcercise')}}</textarea>         
                </div>
                <div class="form-group">
                    <label for="">Lecture Pdf Title</label>
                    <input type="text" class="form-control" name="lecturepdftitle" value="{{old('lecturepdftitle')}}" id="">  
                                
                </div>
                <div class="form-group">
                    <label for="">Lecture File Pdf</label>
                    <input type="file" class="form-control" value="{{old('lecturepdf')}}" name="lecturepdf" id="">  
                                
                </div>
                <div class="form-group">
                    <label for="">Lecture pdf Short Description</label><br><br><br>
                    <textarea id="udescription" name="pdfdescription" cols="48" rows="10">{{old('pdfdescription')}}</textarea>         
                </div>
                <div class="form-group">
                    <label for="">Lecture Audio Title</label>
                    <input type="text" class="form-control" name="lectureaudiotitle" value="{{old('lectureaudiotitle')}}">  
                                
                </div>
                <div class="form-group">
                    <label for="">Lecture Audio</label>
                    <input type="file" class="form-control" value="{{old('lectureaudio')}}" name="lectureaudio" id="">  
                                
                </div>
                <div class="form-group">
                    <label for="">Lecture Audio Short Description</label><br><br><br>
                    <textarea id="udescription" name="audiodescription" cols="48" rows="10">{{old('audiodescription')}}</textarea>         
                </div>
                <div class="form-group">
                    <label for="">Online Exam</label>
                    <select name="exam" class="form-control" id="">
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        
                        
                    </select>  
                                
                </div>
                <div class="form-group">
                    <label for="">Result</label>
                    <select name="result" class="form-control" id="">
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        
                    </select>  
                                
                </div>
                <div class="form-group">
                    <label for="">Contact Form</label>
                    <select name="contactform" class="form-control" id="">
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        
                    </select>  
                                
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save changes</button>            
                </div>
            </form>
        </div>
    </div>
</div>


    
@endsection