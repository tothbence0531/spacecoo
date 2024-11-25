<?php

class OnlineUsersController extends OnlineUsers {
  public function getAllOnlineUsers() {
    return $this->getOnlineUsers();
  }

  public function getAmountOfOnlineUsers($amount) {
    return $this->getOnlineUsers($amount);
  }
}