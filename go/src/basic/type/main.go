package main

import "fmt"

//
// 布尔类型： bool
// 整型： int8、 byte、 int16、 int、 uint、 uintptr等
// 浮点类型： float32、 float64
// 字符串： string
// 复数类型： complex64、 complex128
// 字符类型： rune
// 错误类型： error

// 指针（ pointer）
// 数组（ array）
// 切片（ slice）
// 字典（ map）
// 通道（ chan）
// 结构体（ struct）
// 接口（ interface）

func main() {
	var map1 = make(map[string]int)

	var map2 = map[string]string{}

	map1["age"] = 10

	map2["addr"] = "上海市 浦东新区 航头镇 汇贤雅苑19号楼1101室"
	map2["name"] = "段育德"
	map2["phone"] = "13965017402"

	for key, value := range map2 {
		fmt.Println(key, value)
	}

	_, exist := map2["jianing"]

	fmt.Println(exist)
}
