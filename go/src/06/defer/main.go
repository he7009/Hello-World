package main

import (
	"os"
	"strconv"
)

var a, b int = 0, 1

func f() int {
	a, b = b, a+b
	return a
}

func wrintFile(finename string) {
	file, err := os.Create(finename)
	defer file.Close()
	if err != nil {
		panic("我错了")
	}
	for i := 0; i < 20; i++ {
		num := f()
		s := strconv.Itoa(num)
		_, _ = file.WriteString(s + "\n")
	}

}

func main() {
	wrintFile("a.txt")
}
