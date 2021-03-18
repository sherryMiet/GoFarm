using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class ChangeSence : MonoBehaviour {

	// Use this for initialization
	void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
		
	}
    public void LoadToFarm()
    {
        SceneManager.LoadScene("farm");
    }
    public void LoadBackMain()
    {
        SceneManager.LoadScene("main");
    }
    public void LoadToMarket_buy()
    {
        SceneManager.LoadScene("Market_buy");
    }
    public void LoadToMarket_sell()
    {
        SceneManager.LoadScene("Market_sell");
    }
    public void LoadToLotto()
    {
        SceneManager.LoadScene("lotto");
    }
    public void LoadToStock()
    {
        SceneManager.LoadScene("stock");
    }
    public void LoadToLogin()
    {
        SceneManager.LoadScene("login");
    }
}
