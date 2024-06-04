@php
    $flashNotificationsTemp = session('notification', []);
    if(!empty($flashNotificationsTemp))
        $flashNotificationsTemp = array_reverse($flashNotificationsTemp);
@endphp

<x-base.notification class="flex" id="generic-notification">
    <div class="ml-4 mr-4">
        <div class="font-medium">{title}</div>
        <div class="mt-1 text-slate-500">
            {content}
        </div>
    </div>
</x-base.notification>
<x-base.notification class="flex" id="success-generic-notification">
    <i class="text-xl text-green uil uil-check-circle"></i>
    <div class="ml-4 mr-4">
        <div class="font-medium">{title}</div>
        <div class="mt-1 text-slate-500">
            {content}
        </div>
    </div>
</x-base.notification>
<x-base.notification class="flex" id="info-generic-notification">
    <i class="text-xl text-secondary uil uil-info-circle"></i>
    <div class="ml-4 mr-4">
        <div class="font-medium">{title}</div>
        <div class="mt-1 text-slate-500">
            {content}
        </div>
    </div>
</x-base.notification>
<x-base.notification class="flex" id="danger-generic-notification">
    <i class="text-xl text-red uil uil-times-circle"></i>
    <div class="ml-4 mr-4">
        <div class="font-medium">{title}</div>
        <div class="mt-1 text-slate-500">
            {content}
        </div>
    </div>
</x-base.notification>
<x-base.notification class="flex" id="warning-generic-notification">
    <i class="text-xl text-warning uil uil-exclamation-circle"></i>
    <div class="ml-4 mr-4">
        <div class="font-medium">{title}</div>
        <div class="mt-1 text-slate-500">
            {content}
        </div>
    </div>
</x-base.notification>
@once
    @push('vendors')
        @vite('resources/js/vendor/toastify.js')
    @endpush
@endonce
@push('vendors')
    <script>
        function toastShow(title, message, type, duration = 100000){
            var typeClass, iconString, notificationElement;

            switch(type) {
                case 'success':
                    typeClass = 'text-green';
                    notificationElement = document.getElementById("success-generic-notification").cloneNode(true);
                    break;
                case 'info':
                    typeClass = 'text-secondary';
                    notificationElement = document.getElementById("info-generic-notification").cloneNode(true);
                    break;
                case 'warning':
                    typeClass = 'text-warning';
                    notificationElement = document.getElementById("warning-generic-notification").cloneNode(true);
                    break;
                case 'error':
                case 'danger':
                    typeClass = 'text-red';
                    notificationElement = document.getElementById("danger-generic-notification").cloneNode(true);
                    break;
                default:
                    typeClass = 'text-green';
                    notificationElement = document.getElementById("generic-notification").cloneNode(true);
            }

            notificationElement.removeAttribute("id");
            notificationElement.classList.remove("hidden");
            var outerHTML = notificationElement.outerHTML;
            var modifiedOuterHTML = outerHTML
                .replace('{title}', title)
                .replace('{content}', message)
                .replace('text-success', typeClass);

            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = modifiedOuterHTML;
            var notificationTempElement = tempDiv.firstChild;
            console.log(notificationTempElement);
            Toastify({
                node: notificationTempElement,
                duration: duration,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
            }).showToast();
        }
        document.addEventListener("DOMContentLoaded", function() {

            @foreach ($flashNotificationsTemp as $key => $message)
                @if ($message['place'] == 'overlay')
                    var titleString = '{{ !empty($message['title']) ? $message['title'] : $message['message'] }}';
                    var contentString = '{{ !empty($message['title']) ? $message['message'] : '' }}';
                    toastShow(titleString, contentString, '{{ !empty($message['type']) ? $message['type'] : '' }}', {{ !empty($message['duration']) ? $message['duration'] : null }});
                @endif
            @endforeach

        });
    </script>
@endpush

{{ session()->forget('notification') }}

