<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____  
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \ 
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/ 
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_| 
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 * 
 *
*/

namespace pocketmine\network\protocol;

#include <rules/DataPacket.h>

#ifndef COMPILE
use pocketmine\utils\Binary;

#endif

class AddPlayerPacket extends DataPacket{
	public static $pool = [];
	public static $next = 0;



	public $clientID;
	public $username;
	public $eid;
	public $x;
	public $y;
	public $z;
	public $speedX;
	public $speedY;
	public $speedZ;
	public $pitch;
	public $yaw;
	public $item;
	public $meta;
	public $metadata;

	public $slim = false;
	public $skin = null;

	public function pid(){
		return Info::ADD_PLAYER_PACKET;
	}

	public function decode(){

	}

	public function encode(){
		$this->reset();
		$this->putLong($this->clientID);
		$this->putString($this->username);
		$this->putLong($this->eid);
		$this->putFloat($this->x);
		$this->putFloat($this->y);
		$this->putFloat($this->z);
		$this->putFloat($this->speedX);
		$this->putFloat($this->speedY);
		$this->putFloat($this->speedZ);
		$this->putFloat($this->yaw);
		$this->putFloat($this->yaw); //TODO headrot
		$this->putFloat($this->pitch);
		$this->putShort($this->item);
		$this->putShort($this->meta);
		$this->putByte($this->slim ? 1 : 0);
		$this->putString($this->skin);
		$this->put(Binary::writeMetadata($this->metadata));
	}

}
