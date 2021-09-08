<div class="side-fixed d-none d-lg-block">
    <div class="open">
        <i class="far fa-comment-dots" aria-hidden="true"></i>
        <ul class="ml-1">
            <li data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Live Chat">
                <button>
                    <i class="far fa-comments" aria-hidden="true"></i>
                </button>
            </li>
            <li data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Request Call">
                <button data-bs-toggle="modal" data-bs-target="#contactModal" data-bs-container="body" data-bs-trigger="hover focus" data-bs-placement="right" data-bs-content="Right popover">
                    <i class="far fa-edit" aria-hidden="true"></i>
                </button>
            </li>
            <li data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Messenger Chat">
                <a href="" target="_blank" rel="noreferrer">
                    <i class="fab fa-facebook-messenger" aria-hidden="true"></i>
                </a>
            </li>
            <li data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="WhatsApp">
                <a href="https://api.whatsapp.com/send?phone=" target="_blank" rel="nofollow noreferrer" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Right popover">
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="modal contact-modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-uppercase my-0 py-0">{{ __('messages.send_us_an_email') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <form>
                    <div class="form-group">
                        <input class="form-control form-control-lg" placeholder="{{ __('messages.your_name') }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" placeholder="{{ __('messages.your_email') }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" placeholder="{{ __('messages.your_phone_number') }}">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-lg" rows="3" placeholder="{{ __('messages.your_message') }}"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary text-secondary w-100 btn-lg px-5">{{ __('messages.request_for_details') }}<span class="arrow2 is-triangle arrow-bar is-right"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
