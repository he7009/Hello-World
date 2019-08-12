package main

import "fmt"

func mapdef()  {
	var map_first map[string]int
	var map_second = map[string]int {
		"name":1,
		"age" :3,
	}
	for k,v := range map_first {
		fmt.Println(k,v)
	}

	for k,v := range map_second {
		fmt.Println(k,v)
	}

	age,name := map_second["corr"]
	fmt.Println(age,name)

	age1,name1 := map_second["name"]
	fmt.Println(age1,name1)

}

func main() {
	mapdef()
}
