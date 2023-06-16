
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" id="dropdown-menu">
        <div class="drop-heading border-bottom">
            <div class="d-flex">
                <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">الاشعارات</h6>
                </h6>
            </div>
        </div>
        <div class="notifications-menu" style="overflow: scroll;">
            @foreach ($notifies as $notify)
            @if($notify->type == 1)
            <a class="dropdown-item d-flex">
                <div class="me-3 notifyimg  bg-secondary brround box-shadow-secondary">
                    <i class="fe fe-check-circle"></i>
                </div>
                <div class="mt-1 wd-80p">
                    <h5 class="notification-label mb-1">{{$notify->text}}
                    </h5>
                </div>
            </a>
            @else
            <a class="dropdown-item d-flex">
                <div class="me-3 notifyimg  bg-success brround box-shadow-success">
                    <i class="fe fe-shopping-cart"></i>
                </div>
                <div class="mt-1 wd-80p">
                    <h5 class="notification-label mb-1">{{$notify->text}}
                    </h5>
                </div>
            </a>
            @endif
            @endforeach
        </div>
        <div class="dropdown-divider m-0"></div>
    </div>

<script>
    addEventListener('dropdown', () => {
        document.querySelector('#dropdown-menu').classList.add('show');
        document.querySelector('#dropdown-icon').classList.add('show');
    });
</script>
