#!/usr/local/bin/bash

if [[ $(cat /tmp/ipfw_done) -eq 0 ]]; then
	/sbin/ipfw delete 2002
	/sbin/ipfw add 2002 allow tcp from $(cat /tmp/ipfw_ip) to me >> /dev/null
	echo -n 1 > /tmp/ipfw_done
fi