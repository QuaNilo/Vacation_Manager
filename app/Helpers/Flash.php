<?php
namespace App\Helpers;

class Flash
{
    // An array to store the notifications
    protected $notifications = [];

    /**
     * Constructor for the Flash class.
     *
     * @param string $title - The title of the notification.
     * @param string|null $content - The content/message of the notification.
     */
    public function __construct($title, $content = null)
    {
        // If content is empty, only set the message, otherwise set both title and message
        if (empty($content)) {
            $this->notifications[] = [
                'place' => 'overlay',
                'type' => 'success',
                'message' => $title
            ];
        } else {
            $this->notifications[] = [
                'place' => 'overlay',
                'type' => 'success',
                'title' => $title,
                'message' => $content
            ];
        }
    }

    /**
     * Set the place of the last notification to 'overlay'.
     *
     * @return $this
     */
    public function overlay()
    {
        $this->notifications[count($this->notifications) - 1]['place'] = 'overlay';
        return $this;
    }

    /**
     * Set the place of the last notification to 'important'.
     *
     * @return $this
     */
    public function important()
    {
        $this->notifications[count($this->notifications) - 1]['place'] = 'important';
        return $this;
    }

    /**
     * Set the type of the last notification to 'success'.
     *
     * @return $this
     */
    public function success()
    {
        $this->notifications[count($this->notifications) - 1]['type'] = 'success';
        return $this;
    }

    /**
     * Set the type of the last notification to 'danger'.
     *
     * @return $this
     */
    public function danger()
    {
        $this->notifications[count($this->notifications) - 1]['type'] = 'danger';
        return $this;
    }

    /**
     * Set the type of the last notification to 'warning'.
     *
     * @return $this
     */
    public function warning()
    {
        $this->notifications[count($this->notifications) - 1]['type'] = 'warning';
        return $this;
    }

    /**
     * Set the type of the last notification to 'info'.
     *
     * @return $this
     */
    public function info()
    {
        $this->notifications[count($this->notifications) - 1]['type'] = 'info';
        return $this;
    }

    /**
     * Set the type of the last notification to 'none' (no icon).
     *
     * @return $this
     */
    public function noIcon()
    {
        $this->notifications[count($this->notifications) - 1]['type'] = 'none';
        return $this;
    }

    /**
     * Set the duration for the last notification to autoclose.
     *
     * @param int $milliseconds - Duration in milliseconds. Use -1 to disable auto close.
     * @return $this
     */
    public function duration(int $milliseconds)
    {
        $this->notifications[count($this->notifications) - 1]['duration'] = $milliseconds;
        return $this;
    }

    /**
     * Flash the notifications to the session.
     * Merges existing notifications with new ones.
     */
    public function flash()
    {
        $existingNotifications = session('notification', []);
        $mergedNotifications = array_merge($existingNotifications, $this->notifications);
        session(['notification' => $mergedNotifications]); // added this line instead of flash
    }

    /**
     * Destructor for the Flash class.
     * Automatically flashes the notifications when the object is destroyed.
     */
    public function __destruct()
    {
        $this->flash();
    }
}
