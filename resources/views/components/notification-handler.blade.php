@php
    $flashNotificationsTemp = session('notification', []);
    if(!empty($flashNotificationsTemp))
        $flashNotificationsTemp = array_reverse($flashNotificationsTemp);
    //dd($flashNotificationsTemp);
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
    <x-base.lucide  class="text-success" icon="check-circle" />
    <div class="ml-4 mr-4">
        <div class="font-medium">{title}</div>
        <div class="mt-1 text-slate-500">
            {content}
        </div>
    </div>
</x-base.notification>
<x-base.notification class="flex" id="info-generic-notification">
    <x-base.lucide class="text-info" icon="info"/>
    <div class="ml-4 mr-4">
        <div class="font-medium">{title}</div>
        <div class="mt-1 text-slate-500">
            {content}
        </div>
    </div>
</x-base.notification>
<x-base.notification class="flex" id="danger-generic-notification">
    <x-base.lucide class="text-danger" icon="x-circle"/>
    <div class="ml-4 mr-4">
        <div class="font-medium">{title}</div>
        <div class="mt-1 text-slate-500">
            {content}
        </div>
    </div>
</x-base.notification>
<x-base.notification class="flex" id="warning-generic-notification">
    <x-base.lucide class="text-warning" icon="alert-circle"/>
    <div class="ml-4 mr-4">
        <div class="font-medium">{title}</div>
        <div class="mt-1 text-slate-500">
            {content}
        </div>
    </div>
</x-base.notification>
@push('vendors')
    <script>
        function toastShow(title, message, type, duration = 10000){
            var typeClass, iconString, notificationElement;

            switch(type) {
                case 'success':
                    typeClass = 'text-success';
                    notificationElement = $("#success-generic-notification").clone();
                    break;
                case 'info':
                    typeClass = 'text-info';
                    notificationElement = $("#info-generic-notification").clone();
                    break;
                case 'warning':
                    typeClass = 'text-warning';
                    notificationElement = $("#warning-generic-notification").clone();
                    break;
                case 'error':
                case 'danger':
                    typeClass = 'text-danger';
                    notificationElement = $("#danger-generic-notification").clone();
                    break;
                default:
                    typeClass = 'text-success';
                    notificationElement = $("#generic-notification").clone();
            }

            notificationElement.removeAttr("id");
            var outerHTML = notificationElement.removeClass("hidden")[0].outerHTML;
            var modifiedOuterHTML = outerHTML
                .replace('{title}', title)
                .replace('{content}', message)
                .replace('text-success', typeClass);

            var notificationTempElement = $(modifiedOuterHTML);
            Toastify({
                node: notificationTempElement[0],
                duration: duration,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
            }).showToast();
        }
        window.onload = function() {
            @foreach ($flashNotificationsTemp as $key => $message)
                @if ($message['place'] == 'overlay')
                    var titleString = '{{ !empty($message['title']) ? $message['title'] : $message['message'] }}';
                    var contentString = '{{ !empty($message['title']) ? $message['message'] : '' }}';
                    toastShow(titleString, contentString, '{{ !empty($message['type']) ? $message['type'] : '' }}', {{ !empty($message['duration']) ? $message['duration'] : null }});
                @endif
            @endforeach

        }
    </script>
@endpush

{{ session()->forget('notification') }}
