<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 1/18/2019
 * Time: 9:05 PM
 */


class notification
{
    var $notification_text;

    /**
     * @return mixed
     */
    public function getNotificationText()
    {
        return $this->notification_text;
    }

    /**
     * @param mixed $notification_text
     */
    public function setNotificationText($notification_text)
    {
        $this->notification_text = $notification_text;
    }

    /**
     * @return mixed
     */
    public function getNotificationType()
    {
        return $this->notification_type;
    }

    /**
     * @param mixed $notification_type
     */
    public function setNotificationType($notification_type)
    {
        $this->notification_type = $notification_type;
    }

    var $notification_type;

    public function getEncodedNotification()
    {
        return "?" . (($this->getNotificationType() == NOTIFICATION_TYPE_ERROR) ? "error=" : "message=") . base64_encode($this->getNotificationText()) . "&token=" . sha1($this->getNotificationText());
    }


}