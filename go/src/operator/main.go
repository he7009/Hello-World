package main

import "fmt"

func main() {
	var aa int
	aa = 1 // 00000001

	aa = aa << 1
	aa = aa << 1
	aa = aa << 1
	aa = aa << 1
	aa = aa << 1
	aa = aa << 1
	aa = aa << 1
	aa = aa << 1
	aa = aa << 1
	aa = aa << 1
	aa = aa << 1
	aa = aa << 1
	aa = aa << 1

	bb := 60

	bb = bb >> 3 //00111100

	fmt.Println(bb)

	fmt.Println(aa)
}
