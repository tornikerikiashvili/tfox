
 @push('headStyles')
     <style>
        .form_error {
            color:red;
        }

        .lds-facebook {
  /* change color here */
  color: #1c4c5b
}
.lds-facebook,
.lds-facebook div {
  box-sizing: border-box;
}
.lds-facebook {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
  scale: 0.7;
    margin-top: 8px;
}
.lds-facebook div {
  display: inline-block;
  position: absolute;
  left: 8px;
  width: 16px;
  background: currentColor;
  animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
}
.lds-facebook div:nth-child(1) {
  left: 8px;
  animation-delay: -0.24s;
}
.lds-facebook div:nth-child(2) {
  left: 32px;
  animation-delay: -0.12s;
}
.lds-facebook div:nth-child(3) {
  left: 56px;
  animation-delay: 0s;
}
@keyframes lds-facebook {
  0% {
    top: 8px;
    height: 64px;
  }
  50%, 100% {
    top: 24px;
    height: 32px;
  }
}

.contact-form-box .border-btn-box {
    border: 1px solid white;
    width: 130px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.submit_container {
    display: flex;
    justify-content: center;
}
     </style>
 @endpush
 <div>
 <h4 class="small-title-oswald text-color-4 text-center">{{ $success ? __('_your_message_sent') : __('_get_in_touch') }}</h4>


 <form @if ($success) style="display: none;" @endif id="contact_form" wire:submit.prevent="submit" class="flex-container top-padding-90" method="post" name="formobrsv" id="send_form">
    <!-- column start -->
    <div class="four-columns">
        <x-honeypot />
        <div class="content-right-margin-10 input-box">
               <input wire:model="name" type="text" name="first_name" id="first_name" required class="form-input pointer-small">
               <label wire:ignore for="first_name" class="form-label">{{__('_name')}}</label>
           </div>
        @error('name') <p class="form_error">{{ $message }}</p> @enderror
    </div><!-- column end -->
    <!-- column start -->
    <div class="four-columns">
        <div class="content-left-right-margin-5 input-box">
               <input wire:model="phone" type="text" name="phone" id="phone" required class="form-input pointer-small">
               <label wire:ignore for="phone" class="form-label">{{__('_phone')}}</label>
        </div>
        @error('phone') <p class="form_error">{{ $message }}</p> @enderror
    </div><!-- column end -->
    <!-- column start -->
    <div class="four-columns">
        <div class="content-left-margin-10 input-box">
               <input wire:model="email" type="email" name="email" id="email" required class="form-input pointer-small">
               <label wire:ignore for="email" class="form-label email-label">{{__('_email')}}</label>
        </div>
        @error('email') <p class="form_error">{{ $message }}</p> @enderror
    </div><!-- column end -->
    <!-- column start -->
    <div class="twelve-columns input-box message-input">
           <textarea wire:model="comment" name="comment" id="comment" required class="form-input pointer-small"></textarea>
           <label for="message" class="form-label">{{__('_comment')}}</label>
    </div><!-- column end -->
    <!-- column start -->
    <div wire:ignore class="submit_container twelve-columns text-center top-padding-90">
        <button id="send" class="border-btn-box pointer-large">
            <span class="border-btn-inner">
                  <span class="border-btn" data-text="{{__('_submit')}}">{{__('_submit')}}</span>
                  <div class="lds-facebook"><div></div><div></div><div></div></div>
            </span>
        </button>
        <input style="opacity:0" type="submit" name="hiddenSubmit" id="hiddenSubmit">

    </div><!-- column end -->
</form><!-- flex-container end -->
{{-- @if(!$errors->any())
<h1>Wait...</h1>
@endif --}}
</div>

@push('bodyScripts')

    <script>

        $( document ).ready(function() {
            $( ".lds-facebook" ).hide();
            $( "#send" ).on( "click", function( event ) {
            document.getElementById('hiddenSubmit').click();
           })

            $( "#contact_form" ).on( "submit", function( event ) {
                $( ".border-btn" ).hide();
                $( ".lds-facebook" ).show();
            event.preventDefault();
            });
        });


    </script>
@endpush
