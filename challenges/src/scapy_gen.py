# author: cedric
from scapy.layers.inet import IP, ICMP
from scapy.sendrecv import send
import sys,os
from time import sleep

DST_IP="192.168.0.3"
SRC_IP="192.168.0.4"

if len(sys.argv) == 1:
    quit(1)

strlen = len(sys.argv[1])
pid = os.fork()
if (pid == 0):
    os.system("tcpdump -w out.pcap -c %d 'host %s && icmp'" % (strlen, DST_IP))
    exit(0)
for l in sys.argv[1]:
    packet = IP(src=SRC_IP,dst=DST_IP)/ICMP(id=ord(l))
    send(packet)

sleep(5)
# randomize our real MAC addr
os.system("tcprewrite --enet-mac-seed=$((RANDOM)) -i out.pcap -o attacker.pcap")
