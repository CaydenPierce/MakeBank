import requests
import json

#ticker 
ticker="AAPL"


def getBeta():
	#beta call
	beta = float(requests.get("https://api-v2.intrinio.com/data_point/{}/beta/number?	api_key=OjFiOWUxMTJjMDMyOTdhZDVlNTc4ZDA2YmYxNTZhNmYw".format(ticker)).content)

def callBalanceSheet(ticker):
	#balance sheet call
	balanceSheet = str(requests.get("https://financialmodelingprep.com/api/financials/balance-sheet-statement/{}".format(ticker)).content)
	balanceSheet = balanceSheet[7:len(balanceSheet)-6]
	balanceSheet.replace("\\n", "")
	balanceSheet = ' '.join(balanceSheet.split())
	balanceSheet = balanceSheet.replace("\\n", "")
	balanceSheet = balanceSheet.replace("\\", "")
	balanceSheet = json.loads(balanceSheet)

def getLiab(ticker):
	sheetKeys = list(balanceSheet[ticker]["Additional paid-in capital"].keys())
	max = 0
	for i in range(len(sheetKeys)):
		year = int(sheetKeys[i][:-3])
		if (year > max) and not (balanceSheet[ticker]["Total liabilities"][sheetKeys[i]] == ""):
			ref = sheetKeys[i]
			max = year
	print(max)
	print(balanceSheet[ticker]["Total liabilities"][ref])

def getStockEquity(ticker):
	sheetKeys = list(balanceSheet[ticker]["Total stockholders' equity"].keys())
	max = 0
	for i in range(len(sheetKeys)):
		year = int(sheetKeys[i][:-3])
		if (year > max) and not (balanceSheet[ticker]["Total stockholders' equity"][sheetKeys[i]] == ""):
			ref = sheetKeys[i]
			max = year
	print(max)
	print(balanceSheet[ticker]["Total stockholders' equity"][ref])
	

#Return on equity (ROE) is a measure of financial performance calculated by dividing net income by shareholders' equity.

#The Debt/Equity (D/E) Ratio is calculated by dividing a company's total liabilities by its shareholder equity

#retained earnings




