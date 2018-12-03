/* vim: set ai ts=2 sw=2: */
.section .text
.global _start
_start:
	push %rbp
	mov %rsp, %rbp

	leaq (code), %r9
	movq %r9, -8(%rbp)
	movq $1, %rdx
	movq %rdx, %rdi

.L01:
	xor %rbx, %rbx
	movq $1, %rax
	movq -8(%rbp), %rbx
	movb (%rbx), %r15b
	xorb $0x7, %r15b
	movb %r15b, -9(%rbp)
	leaq -9(%rbp), %rsi
	syscall
	
	incb %bl
	cmpb $0, (%rbx)
	jz .cont
	movq %rbx, -8(%rbp)
	jmp .L01
.cont:
	
	// run like hell!
	xor %rax, %rax
	movb $60, %al
	movb $0, %dil
	syscall
code:
  .byte 0x57
  .byte 0x44
  .byte 0x55
  .byte 0x7c
  .byte 0x64
  .byte 0x35
  .byte 0x64
  .byte 0x58
  .byte 0x6e
  .byte 0x74
  .byte 0x58
  .byte 0x6a
  .byte 0x7e
  .byte 0x58
  .byte 0x6a
  .byte 0x6e
  .byte 0x63
  .byte 0x63
  .byte 0x6b
  .byte 0x62
  .byte 0x58
  .byte 0x69
  .byte 0x66
  .byte 0x6a
  .byte 0x62
  .byte 0x7a
  .byte 0x00
