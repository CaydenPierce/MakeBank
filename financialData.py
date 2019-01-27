import requests
import json

#ticker 
ticker="AAPL"


def getBeta():
	#beta call
	beta = float(requests.get("https://api-v2.intrinio.com/data_point/{}/beta/number?api_key=OjFiOWUxMTJjMDMyOTdhZDVlNTc4ZDA2YmYxNTZhNmYw".format(ticker)).content)

def callBalanceSheet(ticker):
	#balance sheet call
	balanceSheet = str(requests.get("https://financialmodelingprep.com/api/financials/balance-sheet-statement/{}".format(ticker)).content)
	balanceSheet = balanceSheet[7:len(balanceSheet)-6]
	balanceSheet.replace("\\n", "")
	balanceSheet = ' '.join(balanceSheet.split())
	balanceSheet = balanceSheet.replace("\\n", "")
	balanceSheet = balanceSheet.replace("\\", "")
	balanceSheet = json.loads(balanceSheet)
	return balanceSheet

def callIncome(ticker):
	#income sheet call
	incomeSheet = str(requests.get("https://financialmodelingprep.com/api/financials/income-statement/{}".format(ticker)).content)
	incomeSheet = incomeSheet[7:len(incomeSheet)-6]
	incomeSheet.replace("\\n", "")
	incomeSheet = ' '.join(incomeSheet.split())
	incomeSheet = incomeSheet.replace("\\n", "")
	incomeSheet = incomeSheet.replace("\\", "")
	incomeSheet = json.loads(incomeSheet)
	return incomeSheet

def getLiab(ticker):
	sheetKeys = list(balanceSheet[ticker]["Additional paid-in capital"].keys())
	max = 0
	for i in range(len(sheetKeys)):
		year = int(sheetKeys[i][:-3])
		if (year > max) and not (balanceSheet[ticker]["Total liabilities"][sheetKeys[i]] == ""):
			ref = sheetKeys[i]
			max = year
	#print(max)
	return balanceSheet[ticker]["Total liabilities"][ref]

def getStockEquity(ticker):
	sheetKeys = list(balanceSheet[ticker]["Total stockholders' equity"].keys())
	max = 0
	for i in range(len(sheetKeys)):
		year = int(sheetKeys[i][:-3])
		if (year > max) and not (balanceSheet[ticker]["Total stockholders' equity"][sheetKeys[i]] == ""):
			ref = sheetKeys[i]
			max = year
	#print(max)
	return balanceSheet[ticker]["Total stockholders' equity"][ref]

def getNetIncome(ticker):
	sheetKeys = list(incomeSheet[ticker]["Net income"].keys())
	max = 0
	for i in range(len(sheetKeys)):
		try:
   			year = int(sheetKeys[i][:-3])
		except Exception:
   			pass
		
		if (year > max) and not (incomeSheet[ticker]["Net income"][sheetKeys[i]] == ""):
			ref = sheetKeys[i]
			max = year
	#print(max)
	return incomeSheet[ticker]["Net income"][ref]
	
getBeta()
balanceSheet = callBalanceSheet(ticker)
incomeSheet = callIncome(ticker)
print("Liab: {}".format(getLiab(ticker)))
print("Equity: {}".format(getStockEquity(ticker)))
print("Net Income: {}".format(getNetIncome(ticker)))
#Return on equity (ROE) is a measure of financial performance calculated by dividing net income by shareholders' equity.

#The Debt/Equity (D/E) Ratio is calculated by dividing a company's total liabilities by its shareholder equity

#retained earnings




