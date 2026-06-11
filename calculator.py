# Author: Lawrence Emmanuel
# CSC426 Assignment

import tkinter as tk


def button_click(item):
    current = display_var.get()
    display_var.set(current + str(item))

def button_clear():
    display_var.set("")

def button_equal():
    try:
        expression = display_var.get()
      
        expression = expression.replace('^', '**').replace('\\', '//')
        result = str(eval(expression))
        display_var.set(result)
    except Exception:
        display_var.set("Error")
      
root = tk.Tk()
root.title("CSC426 Calculator")
root.geometry("300x400")
root.resizable(0, 0)

display_var = tk.StringVar()

display = tk.Entry(root, textvariable=display_var, font=('Arial', 20, 'bold'), bg="#eee", bd=10, justify="right")
display.grid(row=0, column=0, columnspan=4, ipadx=8, ipady=15, pady=10)

# Button  Matrix
buttons = [
    ('C', 1, 0), ('^', 1, 1), ('%', 1, 2), ('/', 1, 3),
    ('7', 2, 0), ('8', 2, 1), ('9', 2, 2), ('*', 2, 3),
    ('4', 3, 0), ('5', 3, 1), ('6', 3, 2), ('-', 3, 3),
    ('1', 4, 0), ('2', 4, 1), ('3', 4, 2), ('+', 4, 3),
    ('0', 5, 0), ('.', 5, 1), ('\\', 5, 2), ('=', 5, 3)
]

# Button creation and placement
for (text, row, col) in buttons:
    if text == '=':
        btn = tk.Button(root, text=text, font=('Arial', 14), bg="#4caf50", fg="white", height=2, width=5, command=button_equal)
    elif text == 'C':
        btn = tk.Button(root, text=text, font=('Arial', 14), bg="#f44336", fg="white", height=2, width=5, command=button_clear)
    else:
        btn = tk.Button(root, text=text, font=('Arial', 14), height=2, width=5, command=lambda t=text: button_click(t))
    
    btn.grid(row=row, column=col, padx=2, pady=2)

root.mainloop()
