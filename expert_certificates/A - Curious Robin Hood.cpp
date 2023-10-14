
from itertools import permutations

def solve_cryptarithmetic(word1, word2, result):
    unique_chars = set(word1 + word2 + result)
    chars = ''.join(unique_chars)
    digits = '0123456789'

    for perm in permutations(digits, len(unique_chars)):
        mapping = dict(zip(chars, perm))

        if '0' not in mapping[word1[0]] and '0' not in mapping[word2[0]] and '0' not in mapping[result[0]]:
            num1 = int("".join(mapping[char] for char in word1))
            num2 = int("".join(mapping[char] for char in word2))
            num_result = int("".join(mapping[char] for char in result))
            flag = True
            if num1 + num2 == num_result:
                str1= str(num1)
                str2= str(num2)
                if(int(str1[-1])+int(str2[-1])>9):
                    for i in range(min(len(str1),len(str2))-1, 0, -1):
                        if(int(str1[i])+int(str2[i])<9):
                            flag = False
                else:
                    flag = False

                if flag==True:
                    print("Solution found:")
                    print(f"{word1} = {num1}")
                    print(f"{word2} = {num2}")
                    print(f"{result} = {num_result}")
                else:
                    print("No Solution Found")
    return

def prints(word):
    print(word,end=" : ")
    for l in word:
        print(ans[l],end='')
    print()
# Input words from user
# word1 = input("Enter the first word: ").upper()
# word2 = input("Enter the second word: ").upper()
# result = input("Enter the result word: ").upper()
word1,word2,result = 'two','two','four'
# Solve the cryptarithmetic puzzle
solve_cryptarithmetic(word1,word2,result)
# ans = solve_cryptarithmetic(word1, word2, result)
# prints(word1)
# prints(word2)
# prints(word3)
# your code goes here
