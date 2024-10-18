from selenium import webdriver
from selenium.webdriver.chrome.service import Service as ChromeService
from selenium.webdriver.chrome.options import Options
from webdriver_manager.chrome import ChromeDriverManager
import time
from selenium.webdriver.support.ui import WebDriverWait # type: ignore
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.select import Select

# Create Chrome options
options = Options()
options.add_experimental_option("detach", True) 

# Create a Chrome driver instance using WebDriverManager
driver = webdriver.Chrome(executable_path=ChromeDriverManager().install(), options=options) # type: ignore

# Open the ebay website
driver.get("https://www.nike.com/in/")

# Maximize the browser window
driver.maximize_window()

# Scroll from top to bottom slowly
x = 0
while True:
    driver.execute_script('scrollBy(0,50)')  # scroll down by 50 pixels
    time.sleep(0.5)  # wait for 0.5 seconds
    x += 1
    if x > 100:  # stop after 100 iterations (adjust as needed)
        break

    # Scroll back to top
driver.find_element(By.TAG_NAME, 'body').send_keys(Keys.HOME)  # type: ignore
time.sleep(1)  # wait for 1 second

# Find the Sign In button using XPath
sign_in_button_xpath = '//*[@id="gen-nav-commerce-header-v2"]/nav/div[1]/div/div[2]/nav/ul/li[4]/button'
sign_in_button = driver.find_element(By.XPATH, sign_in_button_xpath)

# Click the Sign In button
sign_in_button.click()

# Enter the email ID
email_input = WebDriverWait(driver, 30).until(
    EC.presence_of_element_located((By.XPATH, "/html/body/div[1]/div/div/div/div/form/div/div[2]/div[1]/input"))
)

# Input the email or username
email_input.send_keys("rnithin@aol.com")

# Click the "Continue" button
continue_button_xpath = '/html/body/div[1]/div/div/div/div/form/div/div[4]/button'
continue_button = WebDriverWait(driver, 10).until(
    EC.element_to_be_clickable((By.XPATH, continue_button_xpath))
)
continue_button.click()