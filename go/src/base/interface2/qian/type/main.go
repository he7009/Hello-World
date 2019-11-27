package main

import "fmt"

type notifier interface {
	notify()
}

type user struct {
	name  string
	email string
}

func (u user) notify() {
	fmt.Printf("%s 的邮箱是: %s", u.name, u.email)
}

func main() {
	var duanyude = user{"duanyude", "935005231@qq.com"}
	fmt.Println(duanyude)
	var helilan notifier = duanyude

	if first, ok := helilan.(notifier); ok {
		fmt.Println("实现了接口")
		fmt.Println(ok)
		fmt.Println(first)
	}
}
