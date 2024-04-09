<div>
    <div class="footer_form-inner">

        <div class="input_wrapper is-grow">
            <label wire:ignore for="Email-2" class="subsc_label form_label">{{__('_your_email')}}</label>
            <input wire:model="email" wire:keydown="handleTyping" type="email" class="form_input w-input" maxlength="256" name="email" data-name="Email 2" placeholder="" id="Email-2" >
            @error('email') <p style="display:block" class="form_error">{{ $message }}</p> @enderror
            @if($err_message) <p style="display:block" class="form_error">{{ $err_message }}</p> @endif
          <div class="form_input-icon w-embed"><svg width="25" viewbox="0 0 25 25" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M5.89258 7.22401C5.89258 6.92662 6.13366 6.68555 6.43104 6.68555H19.3541C19.6515 6.68555 19.8926 6.92662 19.8926 7.22401V16.3779C19.8926 16.6635 19.7791 16.9374 19.5772 17.1394C19.3752 17.3413 19.1013 17.4548 18.8156 17.4548H6.9695C6.68388 17.4548 6.40996 17.3413 6.208 17.1394C6.00604 16.9374 5.89258 16.6635 5.89258 16.3779V7.22401ZM6.9695 7.76247V16.3779H18.8156V7.76247H6.9695Z"></path>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.03411 6.86016C6.23506 6.64094 6.57568 6.62613 6.79489 6.82708L12.8926 12.4166L18.9903 6.82708C19.2095 6.62613 19.5501 6.64094 19.751 6.86016C19.952 7.07938 19.9372 7.41999 19.718 7.62094L13.2564 13.544C13.0506 13.7327 12.7346 13.7327 12.5287 13.544L6.06719 7.62094C5.84797 7.41999 5.83316 7.07938 6.03411 6.86016Z"></path>
            </svg></div>
        </div>
      @if($success)
        <a href="#"  wire:click="closeModal" class="button-done button w-inline-block">
          <div class="icon w-embed"><svg width="15" viewbox="0 0 15 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0.175781 5.29468C0.175781 5.01854 0.44441 4.79468 0.775781 4.79468H13.9758C14.3072 4.79468 14.5758 5.01854 14.5758 5.29468C14.5758 5.57082 14.3072 5.79468 13.9758 5.79468H0.775781C0.44441 5.79468 0.175781 5.57082 0.175781 5.29468Z"></path>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.15152 0.441124C8.38583 0.245862 8.76573 0.245862 9.00005 0.441124L14.4 4.94112C14.6344 5.13639 14.6344 5.45297 14.4 5.64823L9.00005 10.1482C8.76573 10.3435 8.38583 10.3435 8.15152 10.1482C7.9172 9.95297 7.9172 9.63639 8.15152 9.44112L13.1273 5.29468L8.15152 1.14823C7.9172 0.952969 7.9172 0.636386 8.15152 0.441124Z"></path>
            </svg></div>
          <div>{{__('_done')}}</div>
        </a>
      @else
        <a href="#" wire:click="submit" class="button is-red w-inline-block">
            <div class="icon w-embed"><svg width="15" viewbox="0 0 15 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.175781 5.29468C0.175781 5.01854 0.44441 4.79468 0.775781 4.79468H13.9758C14.3072 4.79468 14.5758 5.01854 14.5758 5.29468C14.5758 5.57082 14.3072 5.79468 13.9758 5.79468H0.775781C0.44441 5.79468 0.175781 5.57082 0.175781 5.29468Z"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.15152 0.441124C8.38583 0.245862 8.76573 0.245862 9.00005 0.441124L14.4 4.94112C14.6344 5.13639 14.6344 5.45297 14.4 5.64823L9.00005 10.1482C8.76573 10.3435 8.38583 10.3435 8.15152 10.1482C7.9172 9.95297 7.9172 9.63639 8.15152 9.44112L13.1273 5.29468L8.15152 1.14823C7.9172 0.952969 7.9172 0.636386 8.15152 0.441124Z"></path>
              </svg></div>
            <div>{{__('_subscribe')}}</div>
          </a>
      </div>
      @endif
</div>

<script>
window.addEventListener('styleUpdated', event => {
    $('.subsc_label').removeClass('is-top')
})
</script>


