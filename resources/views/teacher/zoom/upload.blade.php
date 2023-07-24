 @extends('layouts.teacherdashboard')

 @section('content')
 <style>
     .drop-zone {
         height: 200px;
         padding: 25px;
         display: flex;
         align-items: center;
         justify-content: center;
         text-align: center;
         font-family: "Quicksand", sans-serif;
         font-weight: 500;
         font-size: 20px;
         cursor: pointer;
         color: #cccccc;
         border: 4px dashed var(--primary-bg-color);
         border-radius: 10px;
     }

     .drop-zone--over {
         border-style: solid;
     }

     .drop-zone__input {
         display: none;
     }

     .drop-zone__thumb {
         width: 100%;
         height: 100%;
         border-radius: 10px;
         overflow: hidden;
         background-color: #cccccc;
         background-size: cover;
         position: relative;
     }

     .drop-zone__thumb::after {
         content: attr(data-label);
         position: absolute;
         bottom: 0;
         left: 0;
         width: 100%;
         padding: 5px 0;
         color: #ffffff;
         background: rgba(0, 0, 0, 0.75);
         font-size: 14px;
         text-align: center;
     }

 </style>
 <div class="main-content app-content mt-0">
     <div class="side-app">

         <!-- CONTAINER -->
         <div class="main-container container-fluid">

             <!-- PAGE-HEADER -->
             <div class="page-header">
                 <h1 class="page-title">رفع مجلد البث</h1>
             </div>
             <!-- PAGE-HEADER END -->

             <!-- ROW-1 OPEN -->
             <div class="row">
                 <div class="col-lg-12">
                     @if(session()->has('error'))
                     <div class="alert alert-danger">
                         {{ session()->get('error') }}
                     </div>
                     @endif
                     <form method="post" action="{{route('post.teacher.zoom-meeting.upload')}}" enctype="multipart/form-data">
                         @csrf
                         <div class="card">
                             <div class="card-header">
                                 <div class="card-title">رفع مجلد البث</div>
                             </div>
                             <div class="card-body">
                                 <input type="hidden" name="folder_name" id="folder_name">

                                 <div class="drop-zone">
                                    <span><i class="fa fa-folder-open-o" aria-hidden="true" style="display:block;"></i></span>
                                     <span class="drop-zone__prompt">اسحب مجلد التسجيل هنا او اضغط لتحديد المجلد</span>
                                     <input type="file" name="myFile" class="drop-zone__input">
                                 </div>

                                 @error('lesson_name')
                                 <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                 @enderror




                                 <div class="card-footer">
                                     <!--Row-->
                                     <div class="row">
                                         <div class="col-md-3"></div>
                                         <div class="col-md-9">
                                             <button type="submit" class="btn btn-primary">رفع</button>
                                         </div>
                                     </div>
                                     <!--End Row-->
                                 </div>
                             </div>
                     </form>
                 </div>
             </div>
             <!-- /ROW-1 CLOSED -->
         </div>
         <!-- CONTAINER CLOSED -->
     </div>
 </div>
 <script>
     document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
         const dropZoneElement = inputElement.closest(".drop-zone");

         dropZoneElement.addEventListener("click", (e) => {
             inputElement.click();
         });

         inputElement.addEventListener("change", (e) => {
             if (inputElement.files.length) {
                 updateThumbnail(dropZoneElement, inputElement.files[0]);
             }
         });

         dropZoneElement.addEventListener("dragover", (e) => {
             e.preventDefault();
             dropZoneElement.classList.add("drop-zone--over");
         });

         ["dragleave", "dragend"].forEach((type) => {
             dropZoneElement.addEventListener(type, (e) => {
                 dropZoneElement.classList.remove("drop-zone--over");
             });
         });

         dropZoneElement.addEventListener("drop", (e) => {
             e.preventDefault();

             if (e.dataTransfer.files.length) {
                 inputElement.files = e.dataTransfer.files;
                 updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
             }

             dropZoneElement.classList.remove("drop-zone--over");
         });
     });

     /**
      * Updates the thumbnail on a drop zone element.
      *
      * @param {HTMLElement} dropZoneElement
      * @param {File} file
      */
     function updateThumbnail(dropZoneElement, file) {
         let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

         // First time - remove the prompt
         if (dropZoneElement.querySelector(".drop-zone__prompt")) {
             dropZoneElement.querySelector(".drop-zone__prompt").remove();
         }

         // First time - there is no thumbnail element, so lets create it
         if (!thumbnailElement) {
             thumbnailElement = document.createElement("div");
             thumbnailElement.classList.add("drop-zone__thumb");
             dropZoneElement.appendChild(thumbnailElement);
         }

         thumbnailElement.dataset.label = file.name;

         // Show thumbnail for image files
         if (file.type.startsWith("image/")) {
             const reader = new FileReader();

             reader.readAsDataURL(file);
             reader.onload = () => {
                 thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
             };
         } else {
             thumbnailElement.style.backgroundImage = null;
         }
     }


     function folderr() {
         var x = document.getElementById("folder").files;
         var txt = x[0].webkitRelativePath;
         document.getElementById("folder_name").value = txt;
     }

     function showpick() {
         document.getElementById("start_time").showPicker();
     }

 </script>
 @endsection
