package main

import "fmt"

func dd(aa int) int {
	if aa == 0 {
		return 5
	} else {
		return aa
	}
}

func main() {
	dd := dd(0)
	fmt.Println(dd)
}
