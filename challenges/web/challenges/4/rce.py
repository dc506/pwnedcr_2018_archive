import sys
import socket
import time

def print_flag():
    print("RCE Console")
    print("Usage:")
    print("========================")
    print("python3 rce.py ip port")
    
if len(sys.argv) == 3:
    ip = sys.argv[1]
    port = int(sys.argv[2])
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    sock.connect((ip,port))
    print("Sending attack!")
    sock.sendall("Nombre: Nightmare 2! PCR{jdiuj58vj50jv004jf993jfiy0}".encode())
    time.sleep(0.5)
    sock.shutdown(socket.SHUT_WR)
    print("Attack completed")
    # nc -lv 10.10.10.145 9876
else:
    print_flag()

